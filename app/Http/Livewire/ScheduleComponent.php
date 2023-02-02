<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Component;

class ScheduleComponent extends Component
{
    public $datePicker;

    public function mount()
    {
    }

    public function updatedDatePicker()
    {
        $this->emit('datePickerUpdated', $this->datePicker);
    }

    public function changeDate()
    {
        dd($this);
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.schedule-component');
    }
}
