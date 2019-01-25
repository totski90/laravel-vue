<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    
    public function create()
    {

        return ['message' => 'put request submitted!'];

    }

    public function store()
    {    	

    	$this->validate(request(), [

    		'name' => 'required',

    		'description' => 'required'

    	]);

    	Project::forceCreate([

    		'name' => request('name'),

    		'description' => request('description')

    	]);

    	return ['message' => 'Project created!'];

    }

    public function destroy()
    {
        return ['message' => 'delete request submitted!'];
    }
}
