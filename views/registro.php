<div class="container mt-5"> 
        <div class="row justify-content-center ">
          <div class="col-md-4 col-lg-4">


            <div class="card">
              <div class="card-header">Registrate en</div>
              <div class="card-body">
                <form action="registro.php" method="post" id="formularioderegistro">

                  <div class="mb-3">
                    <label for="" class="form-label">Usuario:</label>
                    <input
                      type="text"
                      class="form-control"
                      name="Usuario"
                      id="user"
                      aria-describedby="helpId"
                      placeholder="Usuario"
                      required/>
                      
                  </div>
                  
                  <div class="mb-3">
                    <label for="" class="form-label">Email:</label>
                    <input
                      type="text"
                      class="form-control"
                      name="email"
                      id="email"
                      aria-describedby="helpId"
                      placeholder="Email"
                      required/>
                  </div>
                  
                  <div class="mb-3">
                    <label for="" class="form-label">Repetir email:</label>
                    <input
                      type="text"
                      class="form-control"
                      name="reemail"
                      id="reemail"
                      aria-describedby="helpId"
                      placeholder="Email"
                      required/>
                  </div>

                    
                  <div
                  class="row mb-3">
                  <div class="col">
                    <div class="mb-3">
                      <label for="" class="form-label">Contraseña:</label>
                      <input
                        type="password"
                        class="form-control"
                        name="password"
                        id="password"
                        placeholder="Contraseña"
                        required/>
                    </div>
                  </div>
                  <div class="col">
                    <div   class="mb-3">
                      <label for="" class="form-label">Repetir contraseña:</label>
                      <input
                        type="password"
                        class="form-control"
                        name="repassword"
                        id="repassword"
                        placeholder="Repetir contraseña"
                        required/>
                        <div class="invalid-feedback">Las contraseñas no coinciden.</div>
                    </div> 
                  </div>
                </div>



          
     
            
                  <div class="power-container"> 
                      <div id="power-point"></div> 
                  </div>
                  <button class="btn btn-success"  type="submit">Registrarme</button>
                  <a href="login.php" class="btn btn-secondary">Login</a>
                </form>
              </div>
              <div class="card-footer text-muted"></div>
            </div>
            

        </div>
       </div>
      </div>  