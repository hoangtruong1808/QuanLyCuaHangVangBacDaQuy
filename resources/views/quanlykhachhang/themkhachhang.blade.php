@extends('layout')
@section('content')
        <section class="panel">
            <header class="panel-heading">
                Form Elements
            </header>
            <div class="panel-body">
                <form class="form-horizontal bucket-form" method="get">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Default</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Help text</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control">
                            <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Rounder</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control round-input">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Input focus</label>
                        <div class="col-sm-6">
                            <input class="form-control" id="focusedInput" type="text" value="This is focused...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Disabled</label>
                        <div class="col-sm-6">
                            <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..." disabled="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Placeholder</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="placeholder">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" col-sm-3 control-label">Static control</label>
                        <div class="col-lg-6">
                            <p class="form-control-static">email@example.com</p>
                        </div>
                    </div>
                    <div class="form-group has-success">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Input with success</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="inputSuccess">
                        </div>
                    </div>
                    <div class="form-group has-warning">
                        <label class="col-sm-3 control-label col-lg-3" for="inputWarning">Input with warning</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="inputWarning">
                        </div>
                    </div>
                    <div class="form-group has-error">
                        <label class="col-sm-3 control-label col-lg-3" for="inputError">Input with error</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="inputError">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Checkboxes and radios</label>
                        <div class="col-lg-6">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">
                                    Option one is this and that—be sure to include why it's great
                                </label>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">
                                    Option one is this and that—be sure to include why it's great option one
                                </label>
                            </div>

                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                    Option one is this and that—be sure to include why it's great
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                    Option two can be something else and selecting it will deselect option one
                                </label>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </section>

@endsection