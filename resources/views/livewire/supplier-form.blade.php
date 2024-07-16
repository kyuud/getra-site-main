<div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <form wire:submit="submit">
                    <div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nome:</label> 
                                <input type="text" id="name" placeholder="Digite o nome do Fornecedor" class="form-control" wire:model.live="name">
                                @error('name') <span class="error">{{ $message }}</span> @enderror
                            </div> 
                        </div>
                    </div>

                    <div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cnpj_cpf">CNPJ/CPF:</label>
                                <input type="text" id="cnpj_cpf" placeholder="Digite o CNPJ/CPF do Fornecedor" class="form-control" wire:model.live="cnpj">
                                @error('cnpj_cpf') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
</div>
