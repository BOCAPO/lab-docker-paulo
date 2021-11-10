<div class="page-wrapper auth">
    <div class="page-inner bg-brand-gradient">
        <div class="page-content-wrapper bg-transparent m-0" style="padding-left:0px !important">
            <div class="height-10 w-100 shadow-lg px-4 bg-brand-gradient">
                <div class="d-flex align-items-center container p-0">
                    @include('themes.smart.include.logo_login')
                </div>
            </div>
            <div class="flex-1" style="background: url('/assets/theme/smartadmin/img/backgrounds/img-03.jpeg') no-repeat center bottom fixed; background-size: cover;">
                <div class="container py-4 py-lg-8 my-lg-5 px-4 px-sm-0"><br>
                    <div class="row pt-2">
                        <div class="col col-md-6 col-lg-7 hidden-sm-down pt-5 col-xl-6">
                            <h2 class="fs-xxl fw-500 mt-4 text-white pt-5" style="padding-top:40px">{{env('APP_NAME')}}
                                <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60 mt-10">{!! env('APP_SUBTITLE') !!}</small>
                            </h2>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-5 col-xl-6 ml-auto">
                            <div class="card p-4 rounded-plus bg-faded">
                                @if($state == 'form')
                                    <h1 class="text-primary fw-300 mb-3 d-sm-block">CRIAR CONTA</h1>
                                    <form id="js-login" novalidate="" wire:submit.prevent="store()" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="row mb-4">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Nome Completo</label>
                                                    <input type="text" wire:model.defer="form.reg_name" class="form-control form-control-lg {{$errors->has('form.reg_name') ? 'is-invalid' : ''}}">
                                                    @error('form.reg_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label">Telefone*</label>
                                                    <input type="text" wire:model.defer="form.reg_phone" onchange="@this.set('form.reg_phone', this.value);" data-inputmask="'mask': '(99) 99999-9999'" class="form-control form-control-lg {{$errors->has('form.reg_phone') ? 'is-invalid' : ''}}">
                                                    @error('form.reg_phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label class="form-label">Email*</label>
                                                    <input type="email" wire:model.defer="form.reg_email" class="form-control form-control-lg {{$errors->has('form.reg_email') ? 'is-invalid' : ''}}">
                                                    @error('form.reg_email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Senha*</label>
                                                    <input type="password" wire:model.defer="form.reg_password" class="form-control form-control-lg {{$errors->has('form.reg_password') ? 'is-invalid' : ''}}">
                                                    @error('form.reg_password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Confirmar Senha*</label>
                                                    <input type="password" wire:model.defer="form.reg_password_confirmed" class="form-control form-control-lg {{$errors->has('form.reg_password_confirmed') ? 'is-invalid' : ''}}">
                                                    @error('form.reg_password_confirmed')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group text-left">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"  id="rememberme">
                                                        <label class="custom-control-label {{$errors->has('form.reg_password_confirmed') ? 'is-invalid' : ''}}" for="rememberme"> ACEITO O <a target="_blank" href="/assets/docs/politica_privacidade_lgpd.pdf">TERMO DE CONTRATO</a> PARA UTILIZAÇÃO DOS CANAIS</label>
                                                        @error('form.reg_check')<div class="invalid-feedback">É obrigatório o aceite do termo do contrato </div>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row no-gutters mt-2">
                                            <div class="col-lg-12 pl-lg-1 my-2">
                                                <button id="js-login-btn" type="submit" class="btn btn-primary btn-block btn-lg">Criar Conta</button>
                                                <a href="{{url('/')}}/login" id="js-login-btn" type="button" class="btn btn-default btn-block btn-lg">Voltar</a>
                                            </div>
                                        </div>
                                    </form>
                                @endif

                                @if($state == 'confirmed')
                                        <h1 class="text-primary fw-300 mb-3 d-sm-block align-center text-center mt-6">CONTA CRIADO COM SUCESSO.</h1>
                                        <h1 class="text-primary fw-800 mb-3 d-sm-block align-center text-center mt-5">AGUARDE A CONFIRMAÇÃO DO SEU CADASTRO.</h1>

                                        <a href="{{url('/')}}/login" id="js-login-btn" type="button" class="btn btn-primary btn-lg mb-6">Login</a>
                                @endif
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
