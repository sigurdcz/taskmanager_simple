<?php
namespace App\Http\View\Composers;

use App\Model\Task;
use Illuminate\View\View;

class LayoutComposer
{
    /**
     * The $tasks repository implementation.
     *
     * @var Task
     */
    protected $tasks;

    /**
     * Create a new profile composer.
     *
     * @param  Task  $tasks
     * @return void
     */
    public function __construct(Task $tasks)
    {

        $this->tasks = $tasks;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {

        $view->with(['tasks'=> $this->tasks]);
    }
}
