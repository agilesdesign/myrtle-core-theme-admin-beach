<div class="col-xs-12">
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-pills card-header-tabs pull-xs-center">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#today">Today</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#this-week">This Week</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#this-month">This Month</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#this-year">This Year</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#seven">Last 7 Days</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#thirty">Last 30 Days</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#ninety">Last 90 days</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#threesixtyfive">Last 365 days</a>
                </li>
            </ul>
        </div>
        <div class="card-block">
            <h1 class="card-text text-sm-right">
                <div class="tab-content">
                    <div class="tab-pane active" id="today">Registered today: {{ $today }}</div>
                    <div class="tab-pane" id="this-week">Registered this week: {{ $week }}</div>
                    <div class="tab-pane" id="this-month">Registered this month: {{ $month }}</div>
                    <div class="tab-pane" id="this-year">Register this year: {{ $year }}</div>
                    <div class="tab-pane" id="seven">Register in last 7 days: {{ $seven }}</div>
                    <div class="tab-pane" id="thirty">Register in last 30 days: {{ $thirty }}</div>
                    <div class="tab-pane" id="ninety">Register in last 90 days: {{ $ninety }}</div>
                    <div class="tab-pane" id="threesixtyfive">Register in last 365 days: {{ $threesixtyfive }}</div>
                </div>
            </h1>
        </div>
    </div>
</div>