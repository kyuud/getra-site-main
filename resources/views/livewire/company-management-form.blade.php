<div>
    @if(Session::has('success'))
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

    @if($errors->any())
        <div class="alert alert-warning alert-dismissible show fade">
            <div class="alert-title alert-ico">
                <i class="far fa-lightbulb"></i> Atenção
            </div>
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                Confira os campos do formulário!
            </div>
        </div>
    @endif

    <form wire:submit="save" enctype="multipart/form-data">
        <div class="row">
            <div class="form-group col-md-6">
                <label>Nome</label>
                <input type="text" wire:model.live="name" placeholder="Digite o Nome do cliente aqui..." class="form-control">
                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group col-md-6">
                <label>Nome Fantasia</label>
                <input type="text" wire:model.live="fantasyname" placeholder="Digite o Nome Fantasia do cliente aqui..." class="form-control">
                @error('fantasyname') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-10">
                <label>Rua</label>
                <input type="text" wire:model.live="street" placeholder="Digite o Endereço do cliente aqui..." class="form-control">
                @error('street') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group col-md-2">
                <label>Número</label>
                <input type="text" wire:model.live="number" placeholder="Digite o Nº da residência..." class="form-control">
                @error('number') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label>Bairro</label>
                <input type="text" wire:model.live="neighborhood" placeholder="Digite o Bairro do cliente aqui..." class="form-control">
                @error('neighborhood') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group col-md-6">
                <label>Complemento</label>
                <input type="text" wire:model.live="complement" placeholder="Digite o Complemento do cliente aqui..." class="form-control">
                @error('complement') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label>Cidade</label>
                <input type="text" wire:model.live="city" placeholder="Digite o Cidade do cliente aqui..." class="form-control">
                @error('city') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group col-md-6">
                <label>Estado</label>
                <input type="text" wire:model.live="state" placeholder="Digite o Estado do cliente aqui..." class="form-control">
                @error('state') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label>Email</label>
                <input type="email" wire:model.live="email" placeholder="Digite o Email do cliente aqui..." class="form-control">
                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group col-md-6">
                <label>Telefone</label>
                <input type="text" wire:model.live="phone" placeholder="Digite o Telefone do cliente aqui..." class="form-control">
                @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label>CNPJ</label>
                <input type="number" wire:model.live="cnpj" placeholder="Digite o CNPJ do cliente aqui..." class="form-control">
                @error('cnpj') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group col-md-1">
                <label>Status</label>
                <br style="clear: both" />
                <label class="custom-switch mt-2">
                    <input type="checkbox" wire:model.live="status" class="custom-switch-input" id="status">
                    <span class="custom-switch-indicator"></span>
                </label>
            </div>

            <div class="form-group col-md-5" id="monthYear" style="{{ $status == 0 ? '' : 'display: none' }}">
                <label>Mês / Ano da inativação</label>
                <input type="text" wire:model.live="inativation" placeholder="Insira o Mês / Ano da Inativação..." class="form-control" id="inputMonthYear">
                <span style="font-size: 9pt; margin-left: 5px">Exemplo: 01/2022</span>
                @error('inativation') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <label>Número de vidas</label>
                <input type="text" wire:model.live="lives" placeholder="Digite o número de vidas aqui..." class="form-control">
                @error('lives') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group col-md-4">
                <label>Valor por vida</label>
                <input type="text" wire:model.live="value_lives" placeholder="Digite o valor por vida aqui..." class="form-control">
                @error('value_lives') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="form-group col-md-4">
                <label>PDF do contrato</label>
                <input type="file" wire:model.live="pdf" class="form-control" id="new-pdf">
                @error('pdf') <div class="text-danger">{{ $message }}</div> @enderror
                @if(isset($data->pdf) && !empty($data->pdf))
                    <span>
                        <a href="{{ url('/uploads/clients-contracts/' . $data->pdf) }}" target="_blank" download>
                            Clique aqui para baixar PDF do Contrato do cliente.
                        </a>
                    </span>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <label>Observações</label>
                <textarea wire:model.live="observation" placeholder="Digite a observação aqui..." class="form-control"></textarea>
                @error('observation') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary mr-1">Salvar</button>
            @if(!$companyId)
                <button type="submit" wire:click.prevent="save" class="btn btn-info mr-1">Salvar & Criar Novo</button>
            @endif
            <a class="btn btn-secondary" onclick="history.go(-1);" style="cursor:pointer">Cancelar</a>
        </div>
    </form>
</div>
