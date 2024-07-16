<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="row">
            <!-- Fornecedor e Nome do Exame na mesma linha -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Fornecedor</label>
                    <select name="supplier_id" class="form-control" wire:model="supplierId" required>
                        <option value="" disabled selected>Selecione o Fornecedor</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                    @error('supplierId') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nome do exame</label>
                    <input type="text" class="form-control" placeholder="Nome do exame" wire:model="exam_name" required>
                    @error('exam_name') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Valor do Exame e Valor para o Cliente na mesma linha com colunas menores -->
            <div class="col-md-3">
                <div class="form-group">
                    <label>Valor do exame</label>
                    <input type="text" class="form-control" placeholder="Valor do exame" wire:model="valueAmount" required>
                    @error('valueAmount') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Valor para o cliente</label>
                    <input type="text" class="form-control" placeholder="Valor para o cliente" wire:model="valueFee" required>
                    @error('valueFee') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
