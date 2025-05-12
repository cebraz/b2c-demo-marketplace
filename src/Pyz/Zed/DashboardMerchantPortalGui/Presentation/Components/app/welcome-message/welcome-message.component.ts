import {Component, Input} from '@angular/core';
import { ToBoolean } from '@spryker/utils';

@Component({
    selector: 'mp-welcome-message',
    templateUrl: './welcome-message.component.html',
    styleUrl: './welcome-message.component.css'
})
export class WelcomeMessageComponent {
    @Input('username') username : string;
}
