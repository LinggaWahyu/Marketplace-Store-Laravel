@extends('layouts.dashboard')

@section('title')
    Store Setting
@endsection

@section('content')
  <div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
  >
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">Store Settings</h2>
        <p class="dashboard-subtitle">Make store that profitable</p>
      </div>
      <div class="dashboard-content">
        <div class="row">
          <div class="col-12">
            <form action="{{ route('dashboard-settings-redirect', 'dashboard-settings-store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="toko">Name Store</label>
                        <input
                          type="text"
                          name="store_name"
                          id="toko"
                          class="form-control"
                          value="{{ $user->store_name }}"
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="category">Category</label>
                        <select
                          name="categories_id"
                          id="category"
                          class="form-control"
                        >
                          @foreach ($categories as $category)
                            @if ($category->id == $user->categories_id)
                              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="store">Store</label>
                        <p class="text-muted">
                          Apakah saat ini toko Anda buka?
                        </p>
                        <div
                          class="custom-control custom-radio custom-control-inline"
                        >
                          <input
                            type="radio"
                            class="custom-control-input"
                            name="store_status"
                            id="openStoreTrue"
                            value="1"
                            {{ $user->store_status == 1 ? 'checked' : '' }}
                          />
                          <label
                            for="openStoreTrue"
                            class="custom-control-label"
                          >
                            Buka
                          </label>
                        </div>
                        <div
                          class="custom-control custom-radio custom-control-inline"
                        >
                          <input
                            type="radio"
                            class="custom-control-input"
                            name="store_status"
                            id="openStoreFalse"
                            v-model="is_store_open"
                            value="0"
                            {{ $user->store_status == 0 || $user->store_status == NULL ? 'checked' : '' }}
                          />
                          <label
                            for="openStoreFalse"
                            class="custom-control-label"
                          >
                            Sementara Tutup
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col text-right">
                      <button
                        type="submit"
                        class="btn btn-success px-5"
                      >
                        Save Now
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
