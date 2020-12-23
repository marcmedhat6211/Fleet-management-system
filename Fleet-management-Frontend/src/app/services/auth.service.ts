import { HttpClient, HttpClientModule } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  private baseURL = 'http://senergic-fleet-management.herokuapp.com/api'; 

  constructor(private httpClient: HttpClient) { }

  signup(data) {
    return this.httpClient.post(`${this.baseURL}/signup`, data);
  }

  login(data) {
    return this.httpClient.post(`${this.baseURL}/login`, data);
  }

  bookTrip(data) {
    return this.httpClient.post(`${this.baseURL}/trips/create`, data);
  }
}
