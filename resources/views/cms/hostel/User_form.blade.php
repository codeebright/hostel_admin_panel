
{{--{{ddd($Userss->id)}}--}}
<form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{route('User.update' , $Users->id)}}">
    @csrf

    <div class="m-portlet__body">
        <div class="form-group m-form__group m--margin-top-10 m--hide">
            <div class="alert m-alert m-alert--default" role="alert">
                The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
            </div>
        </div>
        <div class="form-group m-form__group row">
            <div class="col-10 ml-auto">
                <h3 class="m-form__section">جزییات شخصی</h3>
            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-2 col-form-label">نام وتخلص</label>
            <div class="col-7">
                <input class="form-control m-input" type="text" name="name"  placeholder="نام وتخلص تانرا وارید کیند" value="{{old('name', isset($Users) ? $Users->name: '')}}">
            </div>
        </div>
        <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-2 col-form-label">ایمیل ادرس</label>
            <div class="col-7">
                <input class="form-control m-input" type="email" name="email" value="{{old('email', isset($Users) ? $Users->email: '')}}" placeholder="ایمیل آدرس ">
            </div>
        </div>

        <div class="form-group m-form__group row">
            <label for="example-text-input" class="col-2 col-form-label">شماره تماس.</label>
            <div class="col-7">
                <input class="form-control m-input" type="text" name="phone" value="{{old('phone', isset($Users) ? $Users->phone: '')}}" placeholder="شماره تماس">
            </div>
        </div>
        <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>

    </div>
    <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-7">
                    <button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">ذخیره تغیرات</button>&nbsp;&nbsp;
                    <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">لغوه</button>
                </div>
            </div>
        </div>
    </div>
</form>
