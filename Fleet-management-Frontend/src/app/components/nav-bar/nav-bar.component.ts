import { Route } from '@angular/compiler/src/core';
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { AuthStatusService } from 'src/app/services/auth-status.service';
import { TokenService } from 'src/app/services/token.service';

@Component({
  selector: 'app-nav-bar',
  templateUrl: './nav-bar.component.html',
  styleUrls: ['./nav-bar.component.scss']
})
export class NavBarComponent implements OnInit {

  public loggedIn: boolean;

  constructor(
    private authStatus: AuthStatusService,
    private router: Router,
    private token: TokenService
  ) { }

  ngOnInit(): void {
    this.authStatus.authStatus.subscribe(value => this.loggedIn = value);
  }

  logout(event: MouseEvent) {
    event.preventDefault();
    this.token.remove();
    this.authStatus.changeAuthStatus(false);
    this.router.navigateByUrl('/');
  }

}
