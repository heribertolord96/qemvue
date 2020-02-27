<template>
  <div>
    <div class="form-group">
      <div class="btn-group">
        <button class="btn btn-success" @click="abrirModal('auth','login')">
          <i class="legt fas fa-key-alt"></i>
          Acceder
        </button>
        <button class="btn btn-success" @click="abrirModal('auth','register')">
          <i class="legt fas fa-list-alt"></i>
          Listar departamentos
        </button>
      </div>
    </div>

    <div
      v-if="modal==1"
      class="modal fade"
      tabindex="-1"
      :class="{'mostrar' : modal}"
      role="dialog"
      aria-labelledby="myModalLabel"
      style="display: none; overflow-y:auto;"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-primary modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header-SUCCESS">
            <h4 class="modal-title" v-text="tituloModal"></h4>
            <button type="button" class="close" @click="cerrarModalDep()" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div style="overflow-x:auto; border:solid ; min-width:80%">
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group row">
                  <label
                    for="email"
                    class="col-md-4 col-form-label text-md-right"
                  >{{ __('E-Mail Address') }}</label>

                  <div class="col-md-6">
                    <input
                      type="text"
                      class="form-control @error('email') is-invalid @enderror"
                      v-model="name"
                      id="name"
                      name="email"
                      value="{{ old('email') }}"
                      required
                      autocomplete="email"
                      autofocus
                    />
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <label
                    for="password"
                    class="col-md-4 col-form-label text-md-right"
                  >{{ __('Password') }}</label>

                  <div class="col-md-6">
                    <input
                      id="password"
                      v-model="password"
                      type="password"
                      class="form-control @error('password') is-invalid @enderror"
                      required
                      autocomplete="current-password"
                    />
                    @error('password')
                    <span
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label
                        class="form-check-label"
                        for="remember"
                      >{{ __('Remember Me') }}</label>
                    </div>
                  </div>
                </div>

                <div class="form-group row mb-0">
                  <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                    @if (Route::has('password.request'))
                    <a
                      class="btn btn-link"
                      href="{{ route('password.request') }}"
                    >{{ __('Forgot Your Password?') }}</a>
                    @endif
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  abrirModal(modelo, accion, data = []) {
    //this.selectCommerceRole();
    switch (modelo) {
      case "auth":
        {
          switch (accion) {
            case "login": {
              //console.log(data);
              this.modal = 1;

              this.name = data["name"];
              this.password = data["password"];
              this.email = data["email"];
              break;
            }
            case "register": {
              this.modal = 2;
              this.name = "";
              this.password = "";
              this.email = "";
              break;
            }
          }
        }
        break;
    }
  }
};
</script>