import { NgModule } from '@angular/core';
import { ButtonLinkComponent, ButtonLinkModule } from '@spryker/button';
import { ChipsComponent, ChipsModule } from '@spryker/chips';
import { WebComponentsModule } from '@spryker/web-components';

import {
    DashboardCardComponent,
    DashboardCardModule,
    DashboardStatsComponent,
    DashboardStatsModule,
    DashboardTableComponent,
    DashboardTableModule,
    DashboardComponent,
    DashboardModule
} from '@mp/dashboard-merchant-portal-gui';

import { DashboardStatsBlockComponent } from '@mp/dashboard-stats-block-merchant-portal-gui';
import { WelcomeMessageModule } from './welcome-message/welcome-message.module';
import { WelcomeMessageComponent } from './welcome-message/welcome-message.component';

@NgModule({
    imports: [
        WebComponentsModule.withComponents([
            DashboardComponent,
            DashboardCardComponent,
            DashboardStatsComponent,
            DashboardStatsBlockComponent,
            ButtonLinkComponent,
            ChipsComponent,
            DashboardTableComponent,
            WelcomeMessageComponent,
        ]),
        ButtonLinkModule,
        ChipsModule,
        DashboardModule,
        DashboardCardModule,
        DashboardStatsModule,
        DashboardTableModule,
        WelcomeMessageModule,
    ],
    providers: [],
})
export class ComponentsModule {}
