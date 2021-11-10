<h3 class="text-primary">Contato</h3>
<div class="row">
    <div class="form-group mb-3 col-md-12">
        <label class="form-label">Email:</label>
        <input type="text" wire:model="form.ctt_email" class="form-control {{$errors->has('form.ctt_email') ? 'is-invalid' : ''}}">
        @error('form.ctt_email')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="form-group mb-3 col-md-6">
        <label class="form-label">Whatsapp:</label>
        <input type="text" wire:model="form.ctt_whatsapp" wire:ignore onchange="@this.set('form.ctt_whatsapp', this.value);" data-inputmask="'mask' : '(99) 99999-9999'" class="form-control {{$errors->has('form.ctt_whatsapp') ? 'is-invalid' : ''}}">
        @error('form.ctt_whatsapp')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="form-group mb-3 col-md-6">
        <label class="form-label">Telefone:</label>
        <input type="text" wire:model="form.ctt_phone" wire:ignore onchange="@this.set('form.ctt_phone', this.value);" data-inputmask="'mask' : '(99) 99999-9999'" class="form-control {{$errors->has('form.ctt_phone') ? 'is-invalid' : ''}}">
        @error('form.ctt_phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<script>
    $(":input").inputmask();
</script>
