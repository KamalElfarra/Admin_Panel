@extends('layouts.app')

@section('content')
    <hr>
    <div class="col-lg-12 col-12  layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>store data </h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form method="post" action="/tables/store">
                    @csrf
                    <div class="form-group row  mb-4">
                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">objectId</label>
                        <div class="col-sm-10">
                            <input type="number" name="objectId" class="form-control form-control-sm" id="colFormLabelSm" placeholder="">
                        </div>

                    </div>
                    <div class="form-group row mb-4">
                        <label for="colFormLabel" class="col-sm-2 col-form-label">number</label>
                        <div class="col-sm-10">
                            <input type="number" name="number" class="form-control" id="colFormLabel" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">accountName</label>
                        <div class="col-sm-10">
                            <input type="email" name="accountName"  class="form-control form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">accountType</label>
                        <div class="col-sm-10">
                            <input type="text" name="accountType" class="form-control form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>

                    </div>
                    <div class="form-group row mb-4">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">userId</label>
                        <div class="col-sm-10">
                            <input type="text" name="userId" class="form-control form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="Email" class="form-control form-control-lg" id="colFormLabelLg" placeholder="">
                        </div>
                    </div>

                    <input type="submit" name="time" class="mb-4 btn btn-primary">
                </form>

                <div class="code-section-container">

                    <button class="btn toggle-code-snippet"><span>Code</span></button>

                    <div class="code-section text-left">
                                            <pre>
&lt;div class="form-group row  mb-4"&gt;
    &lt;label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"&gt;Email&lt;/label&gt;
    &lt;div class="col-sm-10"&gt;
        &lt;input type="email" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm"&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div class="form-group row mb-4"&gt;
    &lt;label for="colFormLabel" class="col-sm-2 col-form-label"&gt;Email&lt;/label&gt;
    &lt;div class="col-sm-10"&gt;
        &lt;input type="email" class="form-control" id="colFormLabel" placeholder="col-form-label"&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;div class="form-group row mb-4"&gt;
    &lt;label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg"&gt;Email&lt;/label&gt;
    &lt;div class="col-sm-10"&gt;
        &lt;input type="email" class="form-control form-control-lg" id="colFormLabelLg" placeholder="col-form-label-lg"&gt;
    &lt;/div&gt;
&lt;/div&gt;
</pre>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
