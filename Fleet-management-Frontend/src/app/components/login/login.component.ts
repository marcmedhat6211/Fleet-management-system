import { HttpClient, HttpClientModule } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

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

  constructor(private httpClient: HttpClient) { }

  onSubmit() {
    return this.httpClient.post('http://localhost:8000/api/login', this.form).subscribe(
      data => console.log(data),
      error => this.handleError(error)      
    );
  }

  handleError(error) {
    this.error = error.error.error;
  }

  ngOnInit(): void {
  }

}
