<?php

namespace App\Models;

class Job {
    public static function all(): array {
        return [
            ['id' => 1, 'title' => 'Software Engineer', 'salary' => 70000],
            ['id' => 2, 'title' => 'Data Scientist', 'salary' => 80000],
            ['id' => 3, 'title' => 'Web Developer', 'salary' => 60000],
        ];
    }

    public static function find($id): ?array {
        $jobs = self::all();
        foreach ($jobs as $job) {
            if ($job['id'] == $id) {
                return $job;
            }
        }

        // condition for aborting
        if ($id < 1 || $id > count($jobs)) {
            abort(404, 'Job not found');
        }

        return null;
    }
}

?>