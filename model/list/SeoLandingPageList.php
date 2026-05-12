<?php
class SeoLandingPageList extends EntityList { protected const ENTITY='seo_landing_page'; protected $orderParam='sort ASC, id ASC'; public function __construct(?array $params, bool $asClassList=false, ?string $class=''){ parent::__construct($params,$asClassList,$class);} }
