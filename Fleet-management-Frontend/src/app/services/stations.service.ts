import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class StationsService {

  private PORT = "http://senergic-fleet-management.herokuapp.com";

  constructor(private httpClient: HttpClient) { }
  
  /*GETTING ALL AVAILABLE STATIONS*/
  showStations() {
    return this.httpClient.get(this.PORT + '/api/stations');
  }
}