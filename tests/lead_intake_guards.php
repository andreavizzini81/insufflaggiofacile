<?php
// Isolated guard tests: no database, network, email, Google Contacts or CRM writes.
namespace PHPMailer\PHPMailer { class Exception extends \Exception {} }
namespace {
    class App {}
    class Request {
        public function __construct(private array $data = [], private ?string $bearer = null) {}
        public function getInputParams(): array { return $this->data; }
        public function getBearerAuthorization(): ?string { return $this->bearer; }
    }
    class RestController {
        protected Request $request;
        public function __construct(Request &$request, App &$app) { $this->request = $request; }
        public function returnErrorMessage(string $message, ?int $code = null): array {
            return ['status' => 0, 'http' => $code, 'message' => $message];
        }
    }
    require __DIR__ . '/../controller/rest/FacebookLeadFormsGatewayController.php';
    class GuardTestController extends FacebookLeadFormsGatewayController {
        public int $processed = 0;
        protected function processLeadRequest() {
            $this->processed++;
            return ['status' => 1];
        }
    }
    function controller(array $data = [], ?string $bearer = null): GuardTestController {
        $request = new Request($data, $bearer);
        $app = new App();
        return new GuardTestController($request, $app);
    }
    function expect(bool $condition, string $message): void {
        if (!$condition) { throw new \RuntimeException($message); }
    }
    $oldEnv = $_ENV;
    $oldToken = getenv('ZAPIER_LEAD_TOKEN');
    try {
        unset($_ENV['ZAPIER_LEAD_TOKEN']);
        putenv('ZAPIER_LEAD_TOKEN');
        $c = controller();
        expect($c->registerIntegrationLeadRequest()['http'] === 503 && $c->processed === 0, 'Missing server token must fail closed');
        $_ENV['ZAPIER_LEAD_TOKEN'] = 'short';
        expect(controller()->registerIntegrationLeadRequest()['http'] === 503, 'Short server token must fail closed');
        $token = str_repeat('test-only-', 8);
        $_ENV['ZAPIER_LEAD_TOKEN'] = $token;
        foreach ([null, '', 'wrong'] as $invalid) {
            $c = controller([], $invalid);
            expect($c->registerIntegrationLeadRequest()['http'] === 401 && $c->processed === 0, 'Invalid bearer must not process a lead');
        }
        $c = controller(['ZAPIER_LEAD_TOKEN' => $token, 'piattaforma' => 'Facebook']);
        expect($c->registerIntegrationLeadRequest()['http'] === 401, 'Body fields must not authenticate an integration');
        $c = controller([], $token);
        expect($c->registerIntegrationLeadRequest()['status'] === 1 && $c->processed === 1, 'Valid bearer must reach processing exactly once');
        $c = controller(['piattaforma' => 'Facebook'], $token);
        expect($c->registerLeadRequest()['http'] === 400 && $c->processed === 0, 'Public action must require reCAPTCHA even with a valid bearer');
        unset($_ENV['ZAPIER_LEAD_TOKEN']);
        putenv('ZAPIER_LEAD_TOKEN=' . $token);
        expect(controller([], $token)->registerIntegrationLeadRequest()['status'] === 1, 'Process environment fallback must work');
        $routes = file_get_contents(__DIR__ . '/../index.php');
        expect((bool)preg_match("/facebook-lead-request[\\s\\S]*?setAction\\('registerIntegrationLeadRequest'\\)/", $routes), 'Integration route must use authenticated action');
        expect((bool)preg_match("/richiedi-preventivo[\\s\\S]*?setAction\\('registerLeadRequest'\\)/", substr($routes, strpos($routes, "group('/api'"))), 'Public API must retain reCAPTCHA action');
        echo "PASS: integration guards, public reCAPTCHA boundary and route separation\n";
    } finally {
        $_ENV = $oldEnv;
        $oldToken === false ? putenv('ZAPIER_LEAD_TOKEN') : putenv('ZAPIER_LEAD_TOKEN=' . $oldToken);
    }
}
