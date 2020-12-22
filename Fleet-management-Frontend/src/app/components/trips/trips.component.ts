import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Buses } from 'src/app/Buses';
import { AuthService } from 'src/app/services/auth.service';

@Component({
  selector: 'app-trips',
  templateUrl: './trips.component.html',
  styleUrls: ['./trips.component.scss']
})
export class TripsComponent implements OnInit {

  public trips = localStorage.getItem('buses');
  buses: Buses

  public form = {
    bus_id: JSON.parse(localStorage.getItem('available_trip')).id,
    user_id: localStorage.getItem('user_id'),
    seat_number: null
  }

  public error: any = [];

  constructor(
    private auth: AuthService,
    private route: Router
    ) { }

  ngOnInit(): void {
    this.buses = JSON.parse(localStorage.getItem('available_trip'));
    console.log(this.buses);
    
    localStorage.removeItem('available_trip');
    localStorage.removeItem('buses');
    localStorage.removeItem('src_name');
    localStorage.removeItem('dest_name');
  }

  onSubmit() {
    this.auth.bookTrip(this.form).subscribe(
      data => this.handleResponse(data),
      error => this.handleError(error)
    );
  }

  handleResponse(data) {
    alert('Trip booked successfully!\nHave a safe trip!');
    this.route.navigateByUrl('/');
  }

  handleError(error) {
    this.error = error.error.errors
  }

}
