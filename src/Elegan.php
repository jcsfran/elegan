<?php

namespace Labi9\Elegan\Src;

use Labi9\Elegan\Src\Actions\{
    DestroyAction,
    IndexAction,
    ShowAction,
    StoreAction,
    UpdateAction,
};

class Elegan
{
    private DestroyAction $delete;
    private IndexAction $index;
    private ShowAction $show;
    private StoreAction $store;
    private UpdateAction $update;

    public function __construct()
    {
        $this->delete = new DestroyAction();
        $this->index = new IndexAction();
        $this->show = new ShowAction();
        $this->store = new StoreAction();
        $this->update = new UpdateAction();
    }

    public function handle(
        array $actions,
        bool $auth,
        string $path,
        array $params,
        array $names,
    ): string {
        $structure = null;

        foreach ($actions as $i => $action) {
            $name = $action;

            if (isset($names[$i])) {
                $name = $names[$i];
            }

            $structure .= $this
                ->{$action}
                ->struct(
                    $auth,
                    $path,
                    $params,
                    $name,
                );
        }

        return $structure;
    }
}
