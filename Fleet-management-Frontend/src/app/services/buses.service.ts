import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class BusesService {

  private PORT = 'http://senergic-fleet-management.herokuapp.com';

  constructor(private httpClient: HttpClient) { }

  /*GET ALL AVAILABLE TRIPS AND BUSES*/
  getBuses() {
    return this.httpClient.get(this.PORT + '/api/buses');
  }
}
