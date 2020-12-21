import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { AuthStatusService } from 'src/app/services/auth-status.service';
import { AuthService } from 'src/app/services/auth.service';
import { TokenService } from 'src/app/services/token.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  public form = {
    email: null,
    password: null,
  };

  public error = null;

  constructor(
    private auth: AuthService,
    private token: TokenService,
    private router: Router,
    private authStatus: AuthStatusService
    ) { }

  onSubmit() {
    this.auth.login(this.form).subscribe(
      data => this.handleResponse(data),
      error => this.handleError(error)      
    );
  }

  handleResponse(data) {
    this.token.handle(data.access_token);
    this.authStatus.changeAuthStatus(true);
    this.router.navigateByUrl('/');
  }

  handleError(error) {
    this.error = error.error.error;
  }

  ngOnInit(): void {
  }

}
