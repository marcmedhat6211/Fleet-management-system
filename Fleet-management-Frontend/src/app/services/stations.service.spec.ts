import { TestBed } from '@angular/core/testing';

import { StationsService } from './stations.service';

describe('StationsServiceService', () => {
  let service: StationsService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(StationsService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
