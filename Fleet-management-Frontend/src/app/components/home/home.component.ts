import { Component, OnInit } from '@angular/core';
import { FormBuilder } from '@angular/forms';
import { Buses } from 'src/app/Buses';
import { BusesService } from 'src/app/services/buses.service';
import { StationsService } from 'src/app/services/stations.service';
import { Stations } from 'src/app/Stations';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { elementEventFullName } from '@angular/compiler/src/view_compiler/view_compiler';

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

  constructor(private stationsService: StationsService, private busesService: BusesService, private formBuilder: FormBuilder) {
    this.srcAndDestForm = this.formBuilder.group({
      src_name: '',
      dest_name: ''
    });
  }

  ngOnInit(): void {
    this.stationsService.showStations().subscribe((data: any) => {
      this.stations = data.data;
    });

    this.busesService.getBuses().subscribe((data: any) => {
      this.buses = data.data;
      console.log(this.buses);
      localStorage.setItem('buses', JSON.stringify(this.buses));
    });


    var busesObj = JSON.parse(localStorage.getItem('buses'));
    for(const [key, value] of Object.entries(busesObj)) {
      if(Object.values(value).indexOf('Cairo') > -1) {
        console.log('Cairo exists');
      } else {
        console.log('Cairo does not exist');
      }
    }
  }

  searchForTrips(src, dest) {
    var busesObj = JSON.parse(localStorage.getItem('buses'));
    for (const [key, value] of Object.entries(busesObj)) {
      if(Object.values(value).indexOf(src) > -1 && Object.values(value).indexOf(dest) > -1) {
        return true;
      }
    }

    return false;
  }

  onSubmit(data) {
    if(data.src_name == data.dest_name) {
      alert('Pick-up point can\'t be the same destination point');
    } else if(!this.searchForTrips(data.src_name, data.dest_name)) {
      alert('Sorry, no available buses for this trip');
    } else {
      this.srcAndDestForm.reset();
      localStorage.setItem('src_name', data.src_name);
      localStorage.setItem('dest_name', data.dest_name);
    }
  }


}
