<div class="col-md-4 mt-2 pr-0">
    <div class="card shadow-sm bg-light">
        <div class="card-body text-center">
          <input type = "hidden" name = "contacts_names[]" value = "{{ $request -> contacts_title }} {{ $request -> contacts_name }}">
          <input type = "hidden" name = "contacts_job_position[]" value = "{{ $request -> contacts_job_position }}">
          <input type = "hidden" name = "contacts_email[]" value = "{{ $request -> contacts_email }}">
          <input type = "hidden" name = "contacts_mobile_number[]" value = "{{ $request -> contacts_mobile ? $request -> contacts_mobile : '-'  }}">
          <input type = "hidden" name = "contacts_phone_number[]" value = "{{ $request -> contacts_phone ? $request -> contacts_phone : '-' }}">
          <input type = "hidden" name = "contacts_street[]" value = "{{ $request -> street ? $request -> street : '-' }}">
          <input type = "hidden" name = "contacts_state[]" value = "{{ $request -> state ? $request -> state : '-' }}">
          <input type = "hidden" name = "çontacts_zip_code[]"value = "{{ $request -> contacts_zip_code ? $request -> contacts_zip_code : '-' }}">
          <input type = "hidden" name = "çontacts_city[]" value = "{{ $request -> contacts_city ? $request -> contacts_city : '-' }}">
          <input type = "hidden" name = "çontacts_country[]" value = "{{ $request -> contacts_country ? $request -> contacts_country :'-' }}">
          <input type = "hidden" name = "çontacts_internal_notes[]" value = "{{ $request -> contacts_internal_notes ? $request -> contacts_internal_notes : '-' }}">
          <input type = "hidden" name = "types[]" value = "{{ $request-> address_type }}">
          <div class="row">
            <div class="col-md-12 text-right">
            <button class = "btn btn-danger" onclick = "delete_record(this)"><i class = "fa fa-trash-alt"></i></button>
            </div>
          </div>
         
        <p class="f-100 lh-10">{{ $request -> contacts_title }} {{ $request -> contacts_name }}</p>
        <p class="f-100 lh-10">{{ $request -> contacts_job_position }}</p>
        <p class="f-100 lh-10">{{ $request -> contacts_email }}</p>
        <p class="f-100 lh-10">{{ $request -> contacts_zip_code }} {{ $request -> contacts_city }}</p>
        <p class="f-100 lh-10">{{ $request -> contacts_state }} {{ $request -> contacts_country }}</p>
        @if($request -> contacts_mobile)
        <p class="f-100 lh-10"> Mobile : {{ $request -> contacts_mobile }}</p>
        @endif
        @if($request -> contacts_phone)
        <p class="f-100 lh-10"> Phone : {{ $request -> contacts_phone }}</p>
        @endif
        <p class="f-100 lh-10"> {{ $request -> contacts_internal_notes }}</p>
        </div>
    </div>
</div>