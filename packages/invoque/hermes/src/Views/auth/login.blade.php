@extends('themes.smart.layouts.auth')

@section('content')
    <div class="page-wrapper auth">
        <div class="page-inner bg-brand-gradient">
            <div class="page-content-wrapper bg-transparent m-0" style="padding-left:0px !important">
                <div class="height-10 w-100 shadow-lg px-4 bg-brand-gradient" style="height: 82px">
                    <div class="d-flex align-items-center container p-0 mt-2">
                        @include('themes.smart.include.logo_login')
                    </div>
                </div>
                <div class="flex-1" style="background: url('/assets/theme/smartadmin/img/backgrounds/img-03.jpeg') no-repeat center bottom fixed; background-size: cover;">
                    <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0"><br>
                        <div class="row pt-5">
                            <div class="col col-md-6 col-lg-7 hidden-sm-down pt-5">
                                <h1 class="fs-xxl fw-500 mt-4 text-white pt-5" style="padding-top:40px">
                                    {{env('APP_NAME')}}
                                    <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60 mt-10">
                                        {!! env('APP_SUBTITLE') !!}
                                    </small>
                                </h1>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-5 col-xl-4 ml-auto">
                                <h1 class="text-white fw-300 mb-3 d-sm-block d-md-none">
                                    Secure login
                                </h1>
                                <div class="card p-4 rounded-plus bg-faded">
                                    @if(sizeof($errors->all()))
                                        <div class="alert alert-danger" role="alert">
                                            {!! current($errors->all()) !!}
                                        </div>
                                    @endif
                                    <form id="js-login" novalidate="" action="{{url('/login')}}" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label class="form-label" for="username">Email</label>
                                            <input type="email" required name="usr_username" id="usr_username" class="form-control form-control-lg" placeholder="" value="" required>
                                            <div class="invalid-feedback">{{ $errors->first('usr_username') }}</div>
                                            <div class="help-block">Digite o seu email</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="password">Senha</label>
                                            <input type="password" name="usr_password" id="usr_password" class="form-control form-control-lg" placeholder="" value="" required>
                                            <div class="invalid-feedback">{{ $errors->first('usr_password') }}</div>
                                            <div class="help-block">Digite sua senha</div>
                                            <div class="help-block"><a href="#"> Esqueci minha senha?</a></div>
                                        </div>
                                        <div class="form-group text-left">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="rememberme">
                                                <label class="custom-control-label" for="rememberme"> Lembre-se de mim pelos próximos 30 dias</label>
                                            </div>
                                        </div>
                                        <div class="row no-gutters">
                                            <div class="col-lg-12 pl-lg-1 my-2">
                                                <button id="js-login-btn" type="submit" class="btn btn-primary btn-block btn-lg">Acessar</button>
                                                <a href="{{url('/')}}/register" id="js-login-btn" type="button" class="btn btn-default btn-block btn-lg">Criar Conta</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white">
                            {!! env('APP_COPYRIGHT') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
