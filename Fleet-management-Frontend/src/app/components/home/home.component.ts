import { Component, OnInit } from '@angular/core';
import { FormBuilder } from '@angular/forms';
import { Buses } from 'src/app/Buses';
import { Stations } from 'src/app/Stations';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { elementEventFullName } from '@angular/compiler/src/view_compiler/view_compiler';
import { Router } from '@angular/router';
import { TokenService } from 'src/app/services/token.service';
import { AuthService } from 'src/app/services/auth.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {

  srcAndDestForm;
  stations: Stations;
  public buses: Buses;
  public busesObj = {};
  public availableTrip = {};

  constructor(
    private formBuilder: FormBuilder,
    private route: Router,
    private token: TokenService,
    private auth: AuthService
  ) {
    this.srcAndDestForm = this.formBuilder.group({
      src_name: '',
      dest_name: ''
    });
  }

  ngOnInit(): void {
    this.auth.showStations().subscribe((data: any) => {
      this.stations = data.data;
    });

    this.auth.getBuses().subscribe((data: any) => {
      this.buses = data.data;
      console.log(this.buses);
      localStorage.setItem('buses', JSON.stringify(this.buses));
    });

  }

  searchForTrips(src, dest) {
    var busesObj = JSON.parse(localStorage.getItem('buses'));
    for (const [key, value] of Object.entries(busesObj)) {
      if (Object.values(value).indexOf(src) > -1 && Object.values(value).indexOf(dest) > -1) {
        localStorage.setItem('available_trip', JSON.stringify(value));
        console.log(value);

        return true;
      }
    }

    return false;
  }


  onSubmit(data) {
    // if (this.token.loggedIn()) {
    if (data.src_name == data.dest_name) {
      alert('Pick-up point can\'t be the same destination point');
    } else if (!this.searchForTrips(data.src_name, data.dest_name)) {
      alert('Sorry, no available buses for this trip');
    } else {
      // if (data.availability) {
      this.srcAndDestForm.reset();
      localStorage.setItem('src_name', data.src_name);
      localStorage.setItem('dest_name', data.dest_name);
      this.route.navigateByUrl('trips');
      // this.route.navigate(['/trips']);
      // } else {
      // alert('Sorry, this trip is fully booked');
      // }
    }
  }
  // } else {
  //   alert('Please login first');
  //   this.route.navigateByUrl('login');
  // }
}
