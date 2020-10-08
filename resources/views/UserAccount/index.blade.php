@extends('layouts.app')
@section('title','Productos')
@section('content')
              <!-- Color System -->
              <div class="row">
                <div class="col-lg-4 mb-4">
                  <div class="card bg-info text-white shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6"><h1>Direcciones</h1></div>
                            <div class="col-6">
                                <div class="text-white-50 small float-right"><i class="fas fa-7x fa-map-marker-alt"></i></div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card bg-success text-white shadow">
                      <div class="card-body">
                          <div class="row">
                              <div class="col-6"><h2>Metodos de Pago</h2></div>
                              <div class="col-6">
                                  <div class="text-white-50 small float-right"><i class="fab fa-7x fa-cc-visa"></i></div>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 mb-4">
                    <div class="card bg-warning text-white shadow">
                      <div class="card-body">
                          <div class="row">
                              <div class="col-6"><h2>Historial de Compras</h2></div>
                              <div class="col-6">
                                  <div class="text-white-50 small float-right"><i class="fas fa-7x fa-tasks"></i></div>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 mb-4">
                    <div class="card bg-secondary text-white shadow">
                      <div class="card-body">
                          <div class="row">
                              <div class="col-6"><h2>Seguridad e Inicio de Sesion</h2></div>
                              <div class="col-6">
                                  <div class="text-white-50 small float-right"><i class="fas fa-7x fa-key"></i></div>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
            </div>

@endsection