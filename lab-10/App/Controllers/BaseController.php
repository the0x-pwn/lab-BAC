<?php

namespace App\Controllers;

abstract class BaseController
{
    abstract public function index();
    abstract public function create();
    abstract public function store();
    abstract public function show();
    abstract public function edit();
    abstract public function update();
    abstract public function destroy();
}