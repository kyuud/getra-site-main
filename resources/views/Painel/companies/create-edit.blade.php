@extends('Painel.templates.template_01')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}

@push('css-extra') @endpush

@push('js-extra')
    @include('Painel.includes.image')
    @include('Painel.includes.save')
@endpush


@section('content')

    {{-- MENSAGENS DE SUCESSO --}}
    @if( Session::has('success') )

        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-title alert-ico">
                <i class="far fa-lightbulb"></i> Sucesso
            </div>
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                {!! Session::get('success') !!}
            </div>
        </div>

    @endif

    {{-- MENSAGENS DE ERRO --}}
    @if( isset($errors) && count($errors) > 0 )
        <div class="alert alert-warning alert-dismissible show fade">
            <div class="alert-title alert-ico">
                <i class="far fa-lightbulb"></i> Atenção
            </div>
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                Confira os campos do formulário!
                {{--@foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach--}}
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Gestão de Endereços</h4>
                </div>
                <div class="card-body">

                    <form action="{{ isset($data) ? route('companies.update', $data->id) : route('companies.store') }}" method="POST"
                        class="form" id="{{ isset($data) ? 'formUpdate' : 'formStore' }}" enctype="multipart/form-data">
                        @if(isset($data))
                        @method('PUT')
                        @endif
                        @csrf
                    
                        <input type="hidden" name="redirects_to" value="{{ URL::previous() }}">
                    
                        <div class="form-group">
                            <label>Rua</label>
                            <input type="text" name="street" value="{{ isset($data) ? $data->street : '' }}"
                                placeholder="Digite a rua do endereço aqui..." class="form-control">
                            @error('street')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                    
                        <div class="form-group">
                            <label>Número</label>
                            <input type="text" name="number" value="{{ isset($data) ? $data->number : '' }}"
                                placeholder="Digite o número do endereço aqui..." class="form-control">
                            @error('number')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                    
                        <div class="form-group">
                            <label>CEP</label>
                            <input type="text" name="cep" value="{{ isset($data) ? $data->cep : '' }}"
                                placeholder="Digite o cep do endereço aqui..." class="form-control">
                            @error('cep')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                    
                        <div class="form-group">
                            <label>Complemento</label>
                            <input type="text" name="plus" value="{{ isset($data) ? $data->plus : '' }}"
                                placeholder="Digite o complemento do endereço aqui..." class="form-control">
                            @error('plus')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                    
                        <div class="form-group">
                            <label>Bairro</label>
                            <input type="text" name="neighborhood" value="{{ isset($data) ? $data->neighborhood : '' }}"
                                placeholder="Digite o bairro do endereço aqui..." class="form-control">
                            @error('neighborhood')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                    
                        <div class="form-group">
                            <label>Cidade</label>
                            <input type="text" name="city" value="{{ isset($data) ? $data->city : '' }}"
                                placeholder="Digite a cidade do endereço aqui..." class="form-control">
                            @error('city')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                    
                        <div class="form-group">
                            <label>Estado</label>
                            <input type="text" name="state" value="{{ isset($data) ? $data->state : '' }}"
                                placeholder="Digite o estado do endereço aqui..." class="form-control">
                            @error('state')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                    
                        <div class="form-group">
                            <label>Telefone</label>
                            <input type="text" name="phone" value="{{ isset($data) ? $data->phone : '' }}"
                                placeholder="Digite o telefone do endereço aqui..." class="form-control">
                            @error('phone')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                    
                        <div class="form-group">
                            <label>Celular</label>
                            <input type="text" name="mobile" value="{{ isset($data) ? $data->mobile : '' }}"
                                placeholder="Digite o celular do endereço aqui..." class="form-control">
                            @error('mobile')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                    
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" name="email" value="{{ isset($data) ? $data->email : '' }}"
                                placeholder="Digite o título do endereço aqui..." class="form-control">
                            @error('email')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                    
                        <div class="form-group">
                            <label>Whatsapp</label>
                            <input type="text" name="whatsapp" value="{{ isset($data) ? $data->whatsapp : '' }}"
                                placeholder="Digite o whatsapp do endereço aqui..." class="form-control">
                            @error('whatsapp')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                    
                        <div class="form-group">
                            <label>Facebook</label>
                            <input type="text" name="facebook" value="{{ isset($data) ? $data->facebook : '' }}"
                                placeholder="Digite o facebook do endereço aqui..." class="form-control">
                            @error('facebook')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                    
                        <div class="form-group">
                            <label>Instagram</label>
                            <input type="text" name="instagram" value="{{ isset($data) ? $data->instagram : '' }}"
                                placeholder="Digite o instagram do endereço aqui..." class="form-control">
                            @error('instagram')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                    
                        <div class="form-group">
                            <label>Youtube</label>
                            <input type="text" name="youtube" value="{{ isset($data) ? $data->youtube : '' }}"
                                placeholder="Digite o título do endereço aqui..." class="form-control">
                            @error('youtube')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                    
                        <div class="form-group">
                            <label>Status</label>
                            <br style="clear: both" />
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="status" value="1"
                                    {{ isset($data['status']) && $data['status'] == 1 ? 'checked' : '' }} class="custom-switch-input"
                                    id="status">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary mr-1">Salvar</button>
                    
                            @if(!isset($data))
                            <button type="submit" id="save_add" class="btn btn-info mr-1">Salvar & Criar Novo</button>
                            @endif
                    
                            <button type="reset" class="btn btn-secondary">Limpar</button>
                        </div>
                    
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

@endsection
