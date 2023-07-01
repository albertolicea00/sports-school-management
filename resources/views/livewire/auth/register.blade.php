        <main class="main-content  mt-0">
            <section>
                <div class="page-header min-vh-100">
                    <div class="container">
                        <div class="row">
                            <div
                                class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                                <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                                    style="background-image: url('../assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
                                </div>
                            </div>
                            <div
                                class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5 mt-7">
                                <div class="card card-plain">
                                    <div class="card-header">
                                        <h4 class="font-weight-bolder">Solicitar cuenta</h4>


                                        @if (Session::has('status'))
                                        <div class="alert alert-success alert-dismissible text-white" role="alert">
                                            <span class="text-sm">{{ Session::get('status') }}</span>
                                            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @elseif (Session::has('in_process'))
                                        <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                            <span class="text-sm">{{ Session::get('in_process') }}</span>
                                            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif



                                        <p class="mb-0">
                                            {{-- Ingresa tus datos para solicitar una cuenta. --}}
                                            Se le pedirán más datos si su solicitud es aceptada.
                                        </p>

                                    </div>
                                    <div class="card-body">
                                        <form wire:submit.prevent ="store">

                                            <div class="input-group input-group-outline @if(strlen($name?? '') > 0) is-filled @endif">
                                                <label class="form-label">Nombre</label>
                                                <input wire:model="name" type="text" class="form-control"
                                                >
                                            </div>
                                            @error('name')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror

                                            <div class="input-group input-group-outline mt-3 @if(strlen($email ?? '') > 0) is-filled @endif">
                                                <label class="form-label">Email</label>
                                                <input wire:model="email" type="email"  class="form-control"
                                                     >
                                            </div>
                                            @error('email')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror

                                            <div class="input-group input-group-outline mt-3 @if(strlen($phone ?? '') > 0) is-filled @endif">
                                                <label class="form-label">Teléfono</label>
                                                <input wire:model="phone" type="tel"  class="form-control"
                                                     >
                                            </div>
                                            @error('phone')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror

                                            <div class="input-group input-group-outline mt-3 @if(strlen($message ?? '') > 0) is-filled @endif">
                                                {{-- <label class="form-label">Mensaje</label> --}}
                                                <textarea wire:model="message" cols="10" rows="4" class="form-control" placeholder="Mensaje"
                                                    title="Diga algunas palabras para el revisor de su solicitud, ¡ No revele información personal o sensible !">
                                                   </textarea>
                                            </div>
                                            @error('message')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror


                                            {{-- <div class="input-group input-group-outline mt-3 @if(strlen($password ?? '') > 0) is-filled @endif">
                                                <label class="form-label">Contraseña</label>
                                                <input wire:model="password" type="password" class="form-control" >
                                            </div>
                                            @error('password')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror --}}



                                            <div class="form-check form-check-info text-start ps-0 mt-3">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault" checked>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Estoy de acuerdo con los
                                                    <a href="javascript:;"
                                                        class="text-dark font-weight-bolder">Términos y Condiciones</a>
                                                </label>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit"
                                                    class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">
                                                    Solicitar
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                        <p class="mb-2 text-sm mx-auto">
                                            ¿ Ya tienes una cuenta ?
                                            <a href="{{ route('login') }}"
                                                class="text-primary text-gradient font-weight-bold">Iniciar sesión</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
