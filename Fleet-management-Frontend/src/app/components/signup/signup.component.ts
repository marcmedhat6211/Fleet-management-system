import { Component, OnInit } from '@angular/core';
import { AuthService } from 'src/app/services/auth.service';

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

  constructor(private authService: AuthService) { }

  onSubmit() {
    this.authService.signup(this.form).subscribe(
      data => console.log(data),
      error => this.handleError(error)      
    );
  }

  handleError(error) {
    this.error = error.error.errors;
  }

  ngOnInit(): void {
  }

}
