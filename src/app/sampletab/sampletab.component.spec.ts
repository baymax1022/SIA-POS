import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SampletabComponent } from './sampletab.component';

describe('SampletabComponent', () => {
  let component: SampletabComponent;
  let fixture: ComponentFixture<SampletabComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ SampletabComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(SampletabComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
