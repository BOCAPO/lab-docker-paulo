<h3 class="text-primary">Endereço</h3>
<div class="row">
    <div class="form-group mb-3 col-md-4">
        <label class="form-label">CEP:*</label>
        <input type="text" id="end_zipcode" data-inputmask="'mask': '99999-999'" wire:model="form.end_zipcode"
               onchange="@this.set('form.end_zipcode', this.value);"
               class="form-control {{$errors->has('form.end_zipcode') ? 'is-invalid' : ''}}">

        @error('form.end_zipcode')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="form-group mb-3 col-md-8">
        <label class="form-label">Endereço:*</label>
        <input type="text" wire:model="form.end_address" class="form-control {{$errors->has('form.end_address') ? 'is-invalid' : ''}}">
        @error('form.end_address')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>
<div class="row">
    <div class="form-group mb-3 col-md-4">
        <label class="form-label">Numero:*</label>
        <input type="text" id="end_number" wire:model="form.end_number" class="form-control {{$errors->has('form.end_number') ? 'is-invalid' : ''}}">
        @error('form.end_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="form-group mb-3 col-md-8">
        <label class="form-label">Bairro:*</label>
        <input type="text" wire:model="form.end_district" class="form-control {{$errors->has('form.end_district') ? 'is-invalid' : ''}}">
        @error('form.end_district')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="form-group mb-3 col-md-8">
        <label class="form-label">Cidade:*</label>
        <input type="text" wire:model="form.end_city" class="form-control {{$errors->has('form.end_city') ? 'is-invalid' : ''}}">
        @error('form.end_city')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="form-group mb-3 col-md-4">
        <label class="form-label">Estado:*</label>
        <input type="text" wire:model="form.end_state" class="form-control {{$errors->has('form.end_state') ? 'is-invalid' : ''}}">
        @error('form.end_state')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#end_zipcode').blur('input', function(e){
            searchAddress($("#end_zipcode").val());
        });
    });

    function searchAddress(zipcode)
    {
        $.getJSON("http://viacep.com.br/ws/"+zipcode+"/json/?callback=?", function(data){
            if (!("erro" in data)){
            @this.set('form.end_address', data.logradouro);
            @this.set('form.end_district', data.bairro);
            @this.set('form.end_state', data.uf);
            @this.set('form.end_city', data.localidade);

                $('#end_number').focus();
            }
        });
    }
</script>
