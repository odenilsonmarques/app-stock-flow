@extends('layouts.template')
@section('title', 'cadastro de produto')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12">
                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card mt-5">
                    <div class="card-header">Cadastro de Entregador</div>
                    <div class="card-body">
                        <form action="{{ route('deliverymens.store') }}" method="post">
                            @csrf<!--csrf toquem de segurnça padrao do laravel para envio de requisao-->


                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="name" class="form-label required">Nome</label>
                                    <input type="text" name="name" id="name" class="form-control only-letters"
                                        placeholder="Digite somente letras" value="{{ old('name') }}" required>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="cpf" class="form-label required">CPF</label>
                                    <input type="text" name="cpf" id="cpf" class="form-control"
                                        placeholder="Digite somente números" value="{{ old('cpf') }}" required>
                                    <div id="cpf-error" class="invalid-feedback" style="display: none;">CPF inválido</div>
                                </div>

                                <script>
                                    document.addEventListener('DOMContentLoaded', (event) => {
                                        const cpfInput = document.getElementById('cpf');
                                        const cpfError = document.getElementById('cpf-error');

                                        cpfInput.addEventListener('input', () => {
                                            let value = cpfInput.value.replace(/\D/g, ''); // Remove não dígitos

                                            // Limita o valor a 11 dígitos
                                            value = value.slice(0, 11);

                                            // Aplica a formatação
                                            value = value.replace(/(\d{3})(\d)/, '$1.$2');
                                            value = value.replace(/(\d{3})(\d)/, '$1.$2');
                                            value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');

                                            cpfInput.value = value;

                                            // Valida o CPF
                                            if (value.length === 14) { // Formato completo do CPF: xxx.xxx.xxx-xx
                                                if (validateCPF(value)) {
                                                    cpfError.style.display = 'none';
                                                    cpfInput.classList.remove('is-invalid');
                                                    cpfInput.classList.add('is-valid');
                                                } else {
                                                    cpfError.style.display = 'block';
                                                    cpfInput.classList.add('is-invalid');
                                                    cpfInput.classList.remove('is-valid');
                                                }
                                            } else {
                                                cpfError.style.display = 'none';
                                                cpfInput.classList.remove('is-invalid');
                                                cpfInput.classList.remove('is-valid');
                                            }
                                        });

                                        function validateCPF(cpf) {
                                            cpf = cpf.replace(/[^\d]+/g, '');

                                            if (cpf.length !== 11 ||
                                                /^(\d)\1{10}$/.test(cpf)) {
                                                return false;
                                            }

                                            let sum = 0;
                                            let remainder;

                                            for (let i = 1; i <= 9; i++) {
                                                sum += parseInt(cpf.substring(i - 1, i)) * (11 - i);
                                            }

                                            remainder = (sum * 10) % 11;

                                            if ((remainder === 10) || (remainder === 11)) remainder = 0;
                                            if (remainder !== parseInt(cpf.substring(9, 10))) return false;

                                            sum = 0;
                                            for (let i = 1; i <= 10; i++) {
                                                sum += parseInt(cpf.substring(i - 1, i)) * (12 - i);
                                            }

                                            remainder = (sum * 10) % 11;

                                            if ((remainder === 10) || (remainder === 11)) remainder = 0;
                                            if (remainder !== parseInt(cpf.substring(10, 11))) return false;

                                            return true;
                                        }
                                    });
                                </script>

                            </div>


                            <div class="row">
                                <div class="col-lg-12 mt-5">
                                    <button class="btn btn-danger"><a href="#">CANCELAR</a></button>
                                    <button type="submit" id="submitBtn" class="btn btn-success">CADASTRAR</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
