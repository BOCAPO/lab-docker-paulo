<?php

namespace Invoque\Zeus\Livewires;

interface BaseComponentInterface
{
    public function render();
    public function store();
    public function edit($id);
    public function delete($id);
}
