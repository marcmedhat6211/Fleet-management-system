import { Component, OnInit } from '@angular/core';
import { StationsService } from 'src/app/services/stations.service';
import { Stations } from 'src/app/Stations';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {

  stations: Stations;

  constructor(private stationsService: StationsService) { }

  ngOnInit(): void {
    this.stationsService.showStations().subscribe((data: any)=>{
      this.stations = data.data
      console.log(this.stations);
    });
  }

}
