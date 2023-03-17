<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Program;
use PHPUnit\Framework\TestCase;

class ProgramTest extends TestCase
{

    public function test_it_program_returns_a_list_of_programs()
    {
        Program::factory()->count(3)->create();

        // $response = $this->getJson('/api/programs');

        // $response
        //     ->assertStatus(200)
        //     ->assertJsonCount(3, 'programs')
        //     ->assertJsonStructure([
        //         'programs' => [
        //             '*' => [
        //                 'id',
        //                 'name',
        //                 'pentesting_start_date',
        //                 'pentesting_end_date',
        //                 'created_at',
        //                 'updated_at',
        //             ],
        //         ],
        //     ]);
    }
// public function test_program_creation()
// {
//     $program = new Program([
//         'name' => 'Test Program',
//         'pentesting_start_date' => '2023-04-01 09:00:00',
//         'pentesting_end_date' => '2023-04-15 17:00:00',
//     ]);

//     $this->assertEquals('Test Program', $program->name);
//     $this->assertEquals('2023-04-01 09:00:00', $program->pentesting_start_date);
//     $this->assertEquals('2023-04-15 17:00:00', $program->pentesting_end_date);
// }
}