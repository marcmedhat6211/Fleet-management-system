import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from 'src/app/services/auth.service';
import { TokenService } from 'src/app/services/token.service';

@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.scss']
})
export class SignupComponent implements OnInit {

  public form = {
    email: null,
    name: null,
    password: null,
    password_confirmation: null
  };

  public error: any = [];

  constructor(
    private auth: AuthService,
    private token: TokenService,
    private router: Router
    ) { }

  onSubmit() {
    this.auth.signup(this.form).subscribe(
      data => this.handleResponse(data),
      error => this.handleError(error)      
    );
  }

  handleResponse(data) {
    this.token.handle(data.access_token);
    this.router.navigateByUrl('/');
  }

  handleError(error) {
    this.error = error.error.errors;
  }

  ngOnInit(): void {
  }

}
