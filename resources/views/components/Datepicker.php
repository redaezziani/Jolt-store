<?php
namespace App\View\Components;

use Illuminate\View\Component;

class Datepicker extends Component
{
    public $wireModel;
    public $startDate;
    public $endDate;
    public $initDateString;
    public $saturdaySelectable;
    public $sundaySelectable;
    public $excludedDates;

    public function __construct(
        $wireModel,
        $startDate,
        $endDate,
        $initDateString = '',
        $saturdaySelectable = true,
        $sundaySelectable = false,
        $excludedDates = '[]'
    ) {
        $this->wireModel = $wireModel;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->initDateString = $initDateString;
        $this->saturdaySelectable = $saturdaySelectable;
        $this->sundaySelectable = $sundaySelectable;
        $this->excludedDates = $excludedDates;
    }

    public function render()
    {
        return view('components.datepicker');
    }
}
?>
