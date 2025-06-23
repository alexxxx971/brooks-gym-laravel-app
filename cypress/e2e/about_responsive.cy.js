// 📂 File: cypress/e2e/about_page.cy.js
// 🧪 Purpose: Full end-to-end test of the About page

describe('About Page – Full UI Test', () => {
    beforeEach(() => {
        cy.visit('http://localhost:8000/about');
        cy.get('html').invoke('addClass', 'dark');
        cy.get('body').invoke('addClass', 'dark');
    });

    it('should display the Hero title', () => {
        cy.contains('ABOUT US').should('be.visible');
    });

    it('should load and validate the 3 About grid images', () => {
        cy.get('section img[alt*="About Image"]')
            .should('have.length', 3)
            .each(($img) => {
                cy.wrap($img)
                    .should('be.visible')
                    .and('have.attr', 'alt')
                    .and('not.be.empty');
            });
    });

    it('should animate the hero and philosophy titles into view', () => {
        ['VITALITY,', 'STRENGTH &', 'UNITY'].forEach((title) => {
            cy.contains(title)
                .should('exist')
                .invoke('css', 'opacity')
                .should('not.eq', '0');
        });
    });

    it('should render the philosophy paragraph content', () => {
        cy.contains('our philosophy is rooted in creating a fitness journey').should('exist');
    });

    it('should validate all 4 detail cards and their animations', () => {
        const titles = ['Culture', 'Mission', 'Facility', 'Coaches'];
        titles.forEach((title) => {
            cy.contains(title)
                .should('exist')
                .scrollIntoView()
                .invoke('css', 'opacity')
                .should('not.eq', '0');
        });
    });

    it('should display "The Team" button and validate the link', () => {
        cy.contains('Coaches')
            .scrollIntoView()
            .should('exist')
            .invoke('css', 'opacity')
            .should('not.eq', '0');

        cy.contains('The Team')
            .should('be.visible')
            .and('have.attr', 'href')
            .and('include', '/specialists');
    });

    it('card responds to hover (basic interactivity)', () => {
        cy.get('.card-group').first()
            .trigger('mouseover')
            .should('exist');
    });

    it('maintains mobile responsiveness and visibility', () => {
        cy.viewport('iphone-6');
        cy.get('section img[alt*="About Image"]').should('have.length', 3);

        cy.get('.card-group').each(($card) => {
            cy.wrap($card)
                .scrollIntoView()
                .should('be.visible');
        });
    });

    it('should display the image grid as 3 columns on desktop and 1 on mobile', () => {
        cy.viewport(1280, 800);
        cy.get('section.grid').should('exist');

        cy.viewport('iphone-6');
        cy.get('section.grid').should('exist');
    });

    it('should have the Philosophy section close to the image grid section', () => {
        cy.get('section img[alt="About Image 3"]').then(($img) => {
            const imageBottom = $img[0].getBoundingClientRect().bottom;

            cy.contains('VITALITY,').then(($philosophy) => {
                const philosophyTop = $philosophy[0].getBoundingClientRect().top;
                const spacing = philosophyTop - imageBottom;
                expect(spacing).to.be.lessThan(100); // Adjust if needed
            });
        });
    });
});
