<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nome da empresa</label>
                <select name="company_id" placeholder="Selecione a empresa" class="form-control" required wire:model.live="company_id">
                    <option value="" disabled selected>Selecione a empresa</option>
                    @foreach($companies as $companyId => $companyName)
                        <option value="{{ $companyId }}">{{ $companyName }}</option>
                    @endforeach
                </select>
                @error('company_id')<div class="text-danger">{{ "***$message" }}</div>@enderror
            </div>
        </div>

        @if (isset($data))
            <div class="col-md-6">
                <div class="form-group">
                    <label>CNPJ</label>
                    <input type="text" name="cnpj" value="{{ $data->company->cnpj }}" readonly class="form-control">
                    @error('cnpj')<div class="text-danger">{{ "***$message" }}</div>@enderror
                </div>
            </div>
        @else
            <div class="col-md-6">
                <div class="form-group">
                    <label>CNPJ</label>
                    <input type="text" name="cnpj" value="{{ old('cnpj') }}" readonly class="form-control">
                    @error('cnpj')<div class="text-danger">{{ "***$message" }}</div>@enderror
                </div>
            </div>
        @endif
        <div class="col-md-6">
            <div class="form-group">
                <label>Funcionário</label>
                <input type="text" name="employee" value="{{ old('employee') }}" placeholder="Digite o nome do funcionário" class="form-control currency" required wire:model.live="employee">
                @error('employee')<div class="text-danger">{{ "***$message" }}</div>@enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>Data do exame</label>
                <input type="date" name="examdate" value="{{ old('examdate') }}" placeholder="" class="form-control" required wire:model.live="examdate">
                @error('examdate')<div class="text-danger">{{ "***$message" }}</div>@enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Fornecedor</label>
                <select name="supplier_id" class="form-control select-supplier" required
                    wire:model.live="supplierId"
                    wire:change="filterExamsBySupplier"
                    wire:key="supplierId"
            >
                <option value=""hidden>Selecione o Fornecedor</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ $supplierId == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                @endforeach
            </select>
            
                @error('supplier_id')<div class="text-danger">{{ "***$message" }}</div>@enderror
            </div>
        </div>
    </div>

    @if($examsList)
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nome do exame</label>
                <select name="exam_id" class="form-control select-exam" required
                    wire:model.live="examId"
                    wire:change="updateExamValueAmount"
                    wire:key="examId"
                >
                    <option value="">Selecione o exame</option>
                    @foreach($examsList as $exam)
                        <option value="{{ $exam['id'] }}">{{ $exam['exam_name']}}</option>
                    @endforeach
                </select>
                @error('exam_id')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Valor do exame</label>
                <input type="text" name="value_amount" id="value_amount" readonly class="form-control" wire:model.live="examValueAmount">
                @error('value_amount')<div class="text-danger">{{ $message }}</div>@enderror
            </div>
        </div>
    </div>
@endif

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <button type="button" class="btn btn-primary" wire:click="saveFormData">Salvar</button>
            </div>
        </div>
    </div>
</div>