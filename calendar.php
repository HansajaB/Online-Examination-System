<?php
class Calendar {
    private $active_year, $active_month, $active_day;
    private $events = [];


    public function __construct($date = null) {
        $this->active_year = $date != null ? date('Y', strtotime($date)) : date('Y');
        $this->active_month = $date != null ? date('m', strtotime($date)) : date('m');
        $this->active_day = $date != null ? date('d', strtotime($date)) : date('d');
    }

    public function add_event($txt, $date, $days = 1, $color = '') {
        $color = $color ? ' ' . $color : $color;
        $this->events[] = [$txt, $date, $days, $color];
    }
    
    public function __toString() {  
        if(isset($_POST['previosMonth'])) {
            $currentDate = date("y-m-d", strtotime("first day of -1 month"));
            
            $this->active_year = $currentDate != null ? date('Y', strtotime($currentDate)) : date('Y');
            $this->active_month = $currentDate != null ? date('m', strtotime($currentDate)) : date('m');
            $this->active_day = $currentDate != null ? date('d', strtotime($currentDate)) : date('d');
        }
        else if(isset($_POST['nextMonth'])) {
            $currentDate = date('y-m-d',strtotime('first day of +1 month'));
            
            $this->active_year = $currentDate != null ? date('Y', strtotime($currentDate)) : date('Y');
            $this->active_month = $currentDate != null ? date('m', strtotime($currentDate)) : date('m');
            $this->active_day = $currentDate != null ? date('d', strtotime($currentDate)) : date('d');
        }

        $num_days = date('t', strtotime($this->active_day . '-' . $this->active_month . '-' . $this->active_year));
        $num_days_last_month = date('j', strtotime('last day of previous month', strtotime($this->active_day . '-' . $this->active_month . '-' . $this->active_year)));
        $days = [0 => 'Sun', 1 => 'Mon', 2 => 'Tue', 3 => 'Wed', 4 => 'Thu', 5 => 'Fri', 6 => 'Sat'];
        $first_day_of_week = array_search(date('D', strtotime($this->active_year . '-' . $this->active_month . '-1')), $days);
        $html = '<div class="calendar" style="background-color:white;">';
        $html .= '<div class="header">';
        $html .= '<div class="month-year">';
        $html .= '<form method="post" align="center">';
        $html .= '<input type="submit" name="previosMonth"
        class="button" value="<" />&nbsp;&nbsp;';

        $html .= date('F Y', strtotime($this->active_year . '-' . $this->active_month . '-' . $this->active_day));
        $html .= ' &nbsp;&nbsp;<input type="submit" name="nextMonth"
        class="button" value=">" />';
        $html .= '</form>';
        
        $html .= '</div>';
        $html .= '</div>';
        $html .= '<div class="days">';
        foreach ($days as $day) {
            $html .= '
                <div class="day_name">
                    ' . $day . '
                </div>
            ';
        }
        for ($i = $first_day_of_week; $i > 0; $i--) {
            $html .= '
                <div class="day_num ignore">
                    ' . ($num_days_last_month-$i+1) . '
                </div>
            ';
        }
        for ($i = 1; $i <= $num_days; $i++) {
            $selected = '';
            if ($i == $this->active_day) {
                $selected = ' selected';
            }
            $html .= '<div class="day_num' . $selected . '">';
            $html .= '<span>' . $i . '</span>';
            foreach ($this->events as $event) {
                for ($d = 0; $d <= ($event[2]-1); $d++) {
                    if (date('y-m-d', strtotime($this->active_year . '-' . $this->active_month . '-' . $i . ' -' . $d . ' day')) == date('y-m-d', strtotime($event[1]))) {
                        $html .= '<div class="event' . $event[3] . '">';
                        $html .= $event[0];
                        $html .= '</div>';
                    }
                }
            }
            $html .= '</div>';
        }
        for ($i = 1; $i <= (42-$num_days-max($first_day_of_week, 0)); $i++) {
            $html .= '
                <div class="day_num ignore">
                    ' . $i . '
                </div>
            ';
        }
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }

}
?>