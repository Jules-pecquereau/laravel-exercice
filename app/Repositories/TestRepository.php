<?php

namespace App\Repositories;

use App\Models\Univers;

class TestRepository
{
    protected Univers $test;

    public function __construct(Univers $test)
    {
        $this->test = $test;
    }

    /**
     * Create a new Univers instance and persist it.
     *
     * @param array<string, mixed> $inputs
     */
    public function store(array $inputs): Univers
    {
        // create a fresh instance from the injected model and set attributes
        $test = $this->test->newInstance($inputs);

        return $this->save($test, $inputs);
    }

    /**
     * Update an existing Univers instance.
     *
     * @param array<string, mixed> $inputs
     */
    public function update(Univers $test, array $inputs): Univers
    {
        return $this->save($test, $inputs);
    }

    /**
     * Fill and save the model.
     *
     * @param Univers $test
     * @param array<string, mixed> $inputs
     */
    private function save(Univers $test, array $inputs): Univers
    {
        // fill attributes (requires $fillable on the model) then persist
        $test->fill($inputs);
        $test->save();

        return $test;
    }
}
