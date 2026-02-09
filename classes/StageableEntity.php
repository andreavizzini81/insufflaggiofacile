<?php

trait StageableEntity {

    public function getStageId(): ?int {
        return $this->stageId;
    }

    public function setStageId(?int $stageId): self {
        $this->stageId = $stageId;
        return $this;
    }

    private function getDefaultStageId(): ?int {
        $list = new CrmStageList([
            'entity' => self::ENTITY_TABLE,
            'is_default' => true
        ]);

        return $list->getFirst();
    }

    public function getStages(): array {
        return (new CrmStageList([
            'entity' => self::ENTITY_TABLE
        ], true, CrmStage::class))->getAll();
    }

    public function getStageManagerConfig(): object {
        return (object)[
            'currentStageId' => $this->stageId,
            'stagesList' => $this->getStages()
        ];
    }

    public function getStageGroups(bool $skipFinal = false): array {
        $groups = [];
        foreach($this->getStages() as $stage) {
            if ($skipFinal && ($stage->isWon() || $stage->isLost())) {
                continue;
            }
            if (is_null($stage->getGroupId())) {
                $token = sprintf('stage%d', $stage->getId());
                $groups[$token] = (object)[
                    'token'    => $token,
                    'isGroup'  => false,
                    'label'    => $stage->getLabel(),
                    'stagesId' => [$stage->getId()],
                    'color'    => $stage->getColor(),
                    'data'     => new stdClass()
                ];
                continue;
            }
            $token = sprintf('group%d', $stage->getGroupId());
            if (!array_key_exists($token, $groups)) {
                $group = $stage->getGroup();
                $groups[$token] = (object)[
                    'token'    => $token,
                    'isGroup'  => true,
                    'label'    => $group->getLabel(),
                    'stagesId' => [],
                    'color'    => $stage->getColor(),
                    'data'     => new stdClass()
                ];
            }
            $groups[$token]->stagesId[] = $stage->getId();
        }
        return $groups;
    }

}