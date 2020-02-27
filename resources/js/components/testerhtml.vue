<template>
  <div>
    <!--Inicio del modalusers agregar/actualizar-->
    <div
      v-if="modal==3"
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
            <button type="button" class="close" @click="cerrarModalUser()" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="card">
                  <div class="card-header">{{ __('Register') }}</div>

                  <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                      @csrf
                      <div class="form-group row">
                        <label
                          for="name"
                          class="col-md-4 col-form-label text-md-right"
                        >{{ __('Name') }}</label>

                        <div class="col-md-6">
                          <input
                            type="text"
                            v-model="user_name"
                            class="form-control @error('name') is-invalid @enderror"
                            id="user_name"
                            required
                            autocomplete="name"
                            autofocus
                            placeholder="American Green Apples"
                            value="{{ old('name') }}"
                          />
                          @error('name')
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
                        <label
                          for="email"
                          class="col-md-4 col-form-label text-md-right"
                        >{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                          <input
                            id="email"
                            type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                          />
                          @error('email')
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
                        <label
                          for="password"
                          class="col-md-4 col-form-label text-md-right"
                        >{{ __('Password') }}</label>

                        <div class="col-md-6">
                          <input
                            id="password"
                            type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password"
                            required
                            autocomplete="new-password"
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
                        <label
                          for="password-confirm"
                          class="col-md-4 col-form-label text-md-right"
                        >{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                          <input
                            id="password-confirm"
                            type="password"
                            class="form-control"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                          />
                        </div>
                      </div>

                      <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                          <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer row">
            <button
              type="button"
              v-if="tipoAccion==9"
              class="btn btn-success fas fa-save"
              @click="registrarUser()"
            >Guardar</button>
            <button
              type="button"
              v-if="tipoAccion==10"
              class="btn btn-success fas fa-save"
              @click="actualizarUser()"
            >Actualizar</button>
            <button
              type="button"
              class="btn btn-success fas fa-close"
              @click="cerrarModalUser()"
            >Cerrar</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal-->
  </div>
</template>