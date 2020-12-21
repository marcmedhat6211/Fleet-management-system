import { HttpClient, HttpClientModule } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';

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

  constructor(private httpClient: HttpClient) { }

  onSubmit() {
    return this.httpClient.post('http://localhost:8000/api/signup', this.form).subscribe(
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
