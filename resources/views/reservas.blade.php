@extends('layouts.app')

@section('title', 'Reservas - RangoDelivery')

@section('styles')
<style>
    .hero-reservas { background: linear-gradient(135deg, #1A1A1A, #2d0a00); padding: 4rem 0; color: #fff; }
    .hero-reservas h1 { font-family: 'Bebas Neue', cursive; font-size: 3rem; }
    .hero-reservas span { color: var(--primary); }
    .form-card { border: none; border-radius: 1.5rem; box-shadow: 0 8px 40px rgba(0,0,0,.10); }
    .form-control, .form-select { border-radius: .7rem; padding: .7rem 1rem; border: 1.5px solid #eee; }
    .form-control:focus, .form-select:focus { border-color: var(--primary); box-shadow: 0 0 0 .2rem rgba(232,50,10,.15); }
    .info-card { background: var(--gray); border-radius: 1.2rem; padding: 1.5rem; }
    .info-icon { font-size: 2rem; margin-bottom: .5rem; }
</style>
@endsection

@section('content')

<section class="hero-reservas">
    <div class="container text-center">
        <h1>Faça sua <span>Reserva</span></h1>
        <p class="text-white-50">Garanta sua mesa e venha nos visitar!</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row gy-4 justify-content-center">

            {{-- Formulário --}}
            <div class="col-lg-7">
                <div class="card form-card p-4 p-md-5">
                    <h4 class="fw-bold mb-4">Dados da reserva</h4>

                    <form>
                        <div class="row gy-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Nome completo</label>
                                <input type="text" class="form-control" placeholder="Seu nome">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Telefone</label>
                                <input type="tel" class="form-control" placeholder="(11) 99999-9999">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Data</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Horário</label>
                                <select class="form-select">
                                    <option>18:00</option>
                                    <option>18:30</option>
                                    <option>19:00</option>
                                    <option>19:30</option>
                                    <option>20:00</option>
                                    <option>20:30</option>
                                    <option>21:00</option>
                                    <option>21:30</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Número de pessoas</label>
                                <select class="form-select">
                                    @for($i = 1; $i <= 10; $i++)
                                    <option>{{ $i }} {{ $i == 1 ? 'pessoa' : 'pessoas' }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Mesa</label>
                                <select class="form-select">
                                    @for($i = 1; $i <= 10; $i++)
                                    <option>Mesa {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Observações (opcional)</label>
                                <textarea class="form-control" rows="3" placeholder="Alguma preferência ou necessidade especial?"></textarea>
                            </div>
                            <div class="col-12 mt-2">
                                <button type="submit" class="btn btn-primary w-100 py-3 fw-bold">
                                    <i class="bi bi-calendar-check me-2"></i> Confirmar Reserva
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Informações --}}
            <div class="col-lg-4">
                <h5 class="fw-bold mb-3">Informações</h5>
                <div class="d-flex flex-column gap-3">
                    <div class="info-card">
                        <div class="info-icon">🕐</div>
                        <h6 class="fw-bold">Horário de funcionamento</h6>
                        <p class="text-muted small mb-0">Seg–Sex: 11h às 23h<br>Sáb–Dom: 10h às 00h</p>
                    </div>
                    <div class="info-card">
                        <div class="info-icon">📍</div>
                        <h6 class="fw-bold">Localização</h6>
                        <p class="text-muted small mb-0">Rua do Sabor, 123<br>Centro, São Paulo - SP</p>
                    </div>
                    <div class="info-card">
                        <div class="info-icon">📞</div>
                        <h6 class="fw-bold">Contato</h6>
                        <p class="text-muted small mb-0">(11) 99999-9999<br>contato@rangodelivery.com</p>
                    </div>
                    <div class="info-card">
                        <div class="info-icon">ℹ️</div>
                        <h6 class="fw-bold">Política de reserva</h6>
                        <p class="text-muted small mb-0">Reservas confirmadas até 30min antes do horário. Após esse prazo, a mesa pode ser liberada.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
