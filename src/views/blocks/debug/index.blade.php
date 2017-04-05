@if(Config::get('app.debug') && Docks::get('bugspray')->enabled())
    <div class="card">
        <div class="card-block">
            <div class="card-title">
                <h4 class="card-title">Debug</h4>
            </div>
            <div class="card-text">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingPermissions">
                        <h5 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#permissions" aria-expanded="true" aria-controls="collapseRoute">
                                Permissions
                            </a>
                        </h5>
                    </div>
                    <div id="permissions" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingRoute">
                        @foreach($debug['permissions'] as $type => $group)
                            {{ dump($type, $group) }}
                        @endforeach
                    </div>
                </div>
                <div id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingConfig">
                            <h5 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#config" aria-expanded="true" aria-controls="collapseConfig">
                                    Config
                                </a>
                            </h5>
                        </div>
                        <div id="config" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingConfig">
                            {{ dump($debug['config']) }}
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSession">
                            <h5 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#session" aria-expanded="true" aria-controls="collapseSession">
                                    Session
                                </a>
                            </h5>
                        </div>
                        <div id="session" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSession">
                            {{ dump($debug['session']) }}
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingRoute">
                        <h5 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#route" aria-expanded="true" aria-controls="collapseRoute">
                                Route
                            </a>
                        </h5>
                    </div>
                    <div id="route" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingRoute">
                        {{ dump($debug['route']['name'], $debug['route']['route']) }}
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingAbilities">
                        <h5 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#abilities" aria-expanded="true" aria-controls="collapseAbilities">
                                Abilities
                            </a>
                        </h5>
                    </div>
                    <div id="abilities" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingAbilities">
                        {{ dump($debug['abilities']) }}
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingDatabase">
                        <h5 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#database" aria-expanded="true" aria-controls="collapseDatabase">
                                Database
                            </a>
                        </h5>
                    </div>
                    <div id="database" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingDatabase">
                        {{ dump('total time:', $debug['database']['transactions']->sum('time')) }}

                        @foreach($debug['database']['transactions'] as $key => $transaction)
                            {{ dump('Query ' . (string) ($key + 1) . ':', $transaction['time'], $transaction['query']) }}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif